<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FrontUser;
use App\Mail\VerifyFrontUserMail;
use App\Models\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class FrontuserController extends Controller
{
    public function registerPost(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:frontUser',
            'password' => 'required|string|min:4|',
            'tel' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
        ]);

        $frontUser = FrontUser::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'tel' => $validatedData['tel'] ?? null,
            'adresse' => $validatedData['adresse'] ?? null,
            'is_verified' => false,
        ]);
        Mail::to($frontUser->email)->send(new VerifyFrontUserMail($frontUser));
        return response()->json(['message' => 'Utilisateur enregistré avec succès.', 'frontuser' => $frontUser], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $frontUser = FrontUser::where('email', $credentials['email'])->first();

        if (!$frontUser) {
            return response()->json(['message' => 'Utilisateur introuvable.'], 404);
        }

        if (!$frontUser->is_verified) {
            return response()->json(['message' => 'Veuillez vérifier votre adresse e-mail avant de vous connecter.'], 403);
        }

        if (!password_verify($request->password, $frontUser->password)) {
            return response()->json(['message' => 'Mot de passe incorrect.'], 401);
        }
        $frontUser->tokens()->delete();

        // Crée un nouveau token Sanctum
        $token = $frontUser->createToken('auth_token')->plainTextToken;



        return response()->json([
            'message' => 'Connexion réussie.',
            'user' => [
                'id' => $frontUser->id,
                'email' => $frontUser->email,
            ],
            'token' => $token,
        ]);
    }

    public function verify(Request $request)
    {
        $frontUser = FrontUser::findOrFail($request->query('user_id'));
        $tokenParam = $request->query('token');

        if (sha1($frontUser->email) !== $tokenParam) {
            return response('Lien invalide.', 400);
        }

        // Mise à jour de l'utilisateur
        $frontUser->is_verified = true;
        $frontUser->roles = json_encode(['ROLE_FRONT']);
        $frontUser->save();

        $sanctumToken = $frontUser->createToken('auth_token')->plainTextToken;


        // Redirection vers le front
        $backendPort = request()->getPort() ?? 8000;
        $frontPort = $backendPort == 8000 ? 5173 : 5174;

        return redirect("http://localhost:{$frontPort}/#/verified?user_id={$frontUser->id}&token={$sanctumToken}");
    }
    public function show($id)
    {
        try {
            $user = FrontUser::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Utilisateur non trouvé.',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération de l’utilisateur.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function message(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Utilisateur non authentifié.'
                ], 401);
            }

            // ✅ Validation du message
            $validated = $request->validate([
                'content' => 'required|string|max:1000',
            ]);

            // ✅ Création du message
            $message = Message::create([
                'content' => $validated['content'],
            ]);

            // ✅ Liaison avec la table de jointure
            $user->messages()->attach($message->id);

            // ✅ Réponse propre
            return response()->json([
                'success' => true,
                'message' => 'Message envoyé avec succès.',
                'data' => [
                    'user_id' => $user->id,
                    'message_id' => $message->id,
                    'content' => $message->content,
                ]
            ], 201);
        } catch (\Exception $e) {
            Log::error('Erreur envoi message : ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’envoi du message.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function index($id)
    {
        // On récupère le user
        $user = FrontUser::find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Utilisateur introuvable'], 404);
        }

        // On récupère tous ses messages via la relation belongsToMany
        $messages = $user->messages()->with('users:id,username,email')->orderBy('created_at', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $messages
        ]);
    }
}
