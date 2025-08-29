<?php

namespace App\Http\Controllers;
use App\Models\Paiement;
use FedaPay\FedaPay;
use FedaPay\Transaction;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $validatedData = $request->validate([
            'montant' => 'required|numeric',
            'countryCode' => 'required|string|max:5',
            'telephone' => 'required|string|max:15',
            'mois' => 'required|string',
            'paymentMethod' => 'required|string',
        ]);

        $user = auth()->id();
        $email = auth()->user()->email;

        // Créer une contribution (Paiement)
        $contribution = Paiement::create([
            'user_id' => $user,
            'montant' => $validatedData['montant'],
            'telephone' => $validatedData['telephone'],
            'mois' => $validatedData['mois'],
            'email' => $email,
            'payment_status' => 'En_attente',
            'status' => false,
        ]);

        // Configurer FedaPay
        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_ENVIRONMENT')); // sandbox ou live

        // Créer la transaction FedaPay
        $transaction = Transaction::create([
            'description' => 'Paiement de cotisation pour ' . $validatedData['mois'],
            'amount' => $validatedData['montant'],
            'currency' => ['iso' => 'XOF'],
            'callback_url' => route('payment.callback', ['id' => $contribution->id]),
            'customer' => [
                'email' => $email,
                'phone_number' => [
                    'number' => $validatedData['telephone'],
                    'country' => 'BJ',
                ],
            ]
        ]);

        // Sauvegarder l’ID de transaction
        $contribution->num_transaction = $transaction->id;
        $contribution->save();

        // Rediriger vers le lien de paiement FedaPay
        return redirect($transaction->generateToken()->url);
    }

    public function paymentCallback($id)
    {
        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_ENVIRONMENT'));

        $contribution = Paiement::findOrFail($id);

        // Récupérer la transaction depuis FedaPay
        $transaction = Transaction::retrieve($contribution->num_transaction);

        if ($transaction->status == 'approuvé') {
            $contribution->update([
                'payment_status' => 'approuvé',
                'status' => true,
            ]);

            return redirect()->back()->with('success', 'Paiement réussi.');
        } else {
            $contribution->update([
                'payment_status' => 'failed',
            ]);

            return redirect()->back()->with('error', 'Paiement échoué.');
        }
    }

}
