<?php

namespace Tests\Feature;

use App\Mail\CompanyCreatedMail;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use WithFaker;

    public function testCanAddCompany()
    {
        Mail::fake();
        $user = User::first();
        $name = $this->faker->company;
        $data = [
            'name' => $name,
            'website' => $this->faker->url,
            'phone' => $this->faker->phoneNumber,
            'logo' => UploadedFile::fake()->image(strtolower(str_replace(' ', '',$name)).'-logo.jpg', 150, 150)
        ];
        $this->followingRedirects()->actingAs($user)->post('/companies', $data);
        $this->assertDatabaseHas(Company::class, collect($data)->except('logo')->toArray());

        Mail::assertSent(CompanyCreatedMail::class, function ($mail) use($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function testCanDeleteEmployee()
    {
        $company = Company::factory()->create();
        $data = [
            'name' => $company->name,
            'phone' => $company->phone,
            'website' => $company->website,
            'logo' => $company->logo
        ];
        $this->assertDatabaseHas(Company::class, $data);
        $this->followingRedirects()->actingAs(User::first())->delete('/companies/'.$company->id);
        $this->assertDatabaseMissing(Company::class, $data);
    }

    public function testCanUpdateEmployee() {
        $company = Company::factory()->create();
        $initialData = [
            'name' => $company->name,
            'phone' => $company->phone,
            'website' => $company->website,
            'logo' => $company->logo
        ];
        $this->assertDatabaseHas(Company::class, $initialData);
        $name = $this->faker->company;
        $newData = [
            'name' => $name,
            'website' => $this->faker->url,
            'phone' => $this->faker->phoneNumber,
            'logo' => UploadedFile::fake()->image(strtolower(str_replace(' ', '',$name)).'-logo.jpg', 150, 150)
        ];

        $this->followingRedirects()->actingAs(User::first())->put('/companies/'.$company->id, $newData);
        $this->assertDatabaseHas(Company::class, collect($newData)->except('logo')->toArray());
        $this->assertDatabaseMissing(Company::class, $initialData);
    }
}
