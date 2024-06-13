<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterUserTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $client->request('GET', '/inscription');

        $client->submitForm('register_user_submit', [
            'register_user[email]' => 'exemple@exemple.com',
            'register_user[plainPassword][first]' => '123456',
            'register_user[plainPassword][second]' => '123456',
            'register_user[firstname]' => 'Exem',
            'register_user[lastname]' => 'Ple'
        ]);

        $this->assertResponseRedirects('/connexion');
        $client->followRedirect();

        $this->assertSelectorExists('div:contains("Votre compte a bien été créé. Veuillez vous connecter.")');



        

    }
}
