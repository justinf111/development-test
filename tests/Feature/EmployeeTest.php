<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use WithFaker;

    public function testCanAddEmployee()
    {
        $company = Company::factory()->create();
        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'company_id' => $company->id
        ];
        $this->followingRedirects()->actingAs(User::first())->post('/employees', $data);
        $this->assertDatabaseHas(Employee::class, $data);
    }

    public function testCanDeleteEmployee()
    {
        $employee = Employee::factory()->create();
        $data = [
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
            'phone' => $employee->phone,
            'email' => $employee->email,
            'company_id' => $employee->company_id
        ];
        $this->assertDatabaseHas(Employee::class, $data);
        $this->followingRedirects()->actingAs(User::first())->delete('/employees/'.$employee->id);
        $this->assertDatabaseMissing(Employee::class, $data);
    }

    public function testCanUpdateEmployee() {
        $employee = Employee::factory()->create();
        $initialData = [
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
            'phone' => $employee->phone,
            'email' => $employee->email,
            'company_id' => $employee->company_id
        ];
        $this->assertDatabaseHas(Employee::class, $initialData);
        $company = Company::factory()->create();
        $newData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'company_id' => $company->id
        ];

        $this->followingRedirects()->actingAs(User::first())->put('/employees/'.$employee->id, $newData);
        $this->assertDatabaseHas(Employee::class, $newData);
        $this->assertDatabaseMissing(Employee::class, $initialData);
    }
}
