<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
                    ['name' => 'employee.create'],
                    ['name' => 'employee.view'],
                    ['name' => 'employee.edit'],
                    ['name' => 'employee.delete'],

                    ['name' => 'employeeNote.create'],
                    ['name' => 'employeeNote.view'],
                    ['name' => 'employeeNote.edit'],
                    ['name' => 'employeeNote.delete'],

                    ['name' => 'customer.create'],
                    ['name' => 'customer.view'],
                    ['name' => 'customer.edit'],
                    ['name' => 'customer.delete'],

                    ['name' => 'contact.create'],
                    ['name' => 'contact.view'],
                    ['name' => 'contact.edit'],
                    ['name' => 'contact.delete'],

                    ['name' => 'customerNote.create'],
                    ['name' => 'customerNote.view'],
                    ['name' => 'customerNote.edit'],
                    ['name' => 'customerNote.delete'],

                    ['name' => 'project.list'],
                    ['name' => 'project.create'],
                    ['name' => 'project.edit'],
                    ['name' => 'project.delete'],

            



                    ['name' => 'file.create'],
                    ['name' => 'setting'],
                    ['name' => 'profile.edit'],
                    ['name' => 'sales.invoices'],

                    ['name' => 'knowledge_base.create'],
                    ['name' => 'knowledge_base.view'],
                    ['name' => 'knowledge_base.edit'],
                    ['name' => 'knowledge_base.delete'],

                    ['name' => 'expense.create'],
                    ['name' => 'expense.edit'],
                    ['name' => 'expense.delete'],

                    ['name' => 'leaves.create'],
                    ['name' => 'leaves.edit'],
                    ['name' => 'leaves.delete'],

                    ['name' => 'tickets.create'],
                    ['name' => 'tickets.view'],
                    ['name' => 'tickets.edit'],
                    ['name' => 'tickets.delete'],

                    ['name' => 'report.view'],
                    ['name' => 'report.create'],
                    ['name' => 'report.edit'],
                    ['name' => 'report.delete'],

                    ['name' => 'role.create'],
                    ['name' => 'role.view'],
                    ['name' => 'role.edit'],
                    ['name' => 'role.delete'],
                ];



        foreach ($permissions as $permission) {
            Permission::create($permission);
        }


        $deafult_permissions=[
            ['name' => 'tickets.create'],
            ['name' => 'tickets.view'],
            ['name' => 'tickets.edit'],
            ['name' => 'tickets.delete'],

            
            ['name' => 'project.list'],
            ['name' => 'project.create'],
            ['name' => 'project.edit'],
            ['name' => 'project.delete'],

            ['name' => 'employee.create'],
            ['name' => 'employee.view'],
            ['name' => 'employee.edit'],
            ['name' => 'employee.delete'],


            ['name' => 'role.create'],
            ['name' => 'role.view'],
            ['name' => 'role.edit'],
            ['name' => 'role.delete'],
        ];

        //add static roles for create acount
        foreach(array_keys(config('constants.user_types'))  as $type){

            if($type=='SITE_MANAGENMENT'){
                $StaticRole = Role::create([
                    'name' => 'superadmin',
                    'type' =>$type,
                    'is_primary'=>1,
                ]);
                $StaticRole->syncPermissions($permissions);

            }
            else if($type=='ESTATE_OWNER'  ){
                $StaticRole = Role::create([
                    'name' => 'Estate Owner',
                    'type' =>$type,
                    'is_primary'=>1,
                ]);
                $StaticRole->syncPermissions($deafult_permissions);
            }
            else if($type=='ENGINEERING_OFFICE_MANAGER'){
                $StaticRole = Role::create([
                    'name' => 'Engineering Office Manager',
                    'type' =>$type,
                    'is_primary'=>1,
                ]);
                $StaticRole->syncPermissions($deafult_permissions);
            }
            else{
                $StaticRole = Role::create([
                    'name' => config('constants.user_types')[$type],
                    'type' =>$type,
                     'is_primary'=>1,
                ]);
                $StaticRole->syncPermissions(['employee.create', 'employee.view', 'employee.edit','employee.delete']);
            }
          //  $StaticRole =  Role::create(['name' =>  config('constants.user_types')[$type] , 'type'=> config('constants.user_types')[$type]]);
        }

     
        //Superadmin role.
      //  $superadmin = Role::create(['name' => 'superadmin']);
      //  $superadmin->syncPermissions($permissions);
        //Employ ee role.
    //    $employeeRole = Role::create(['name' => 'employee', 'type' => 'employee']);
       // $employeeRole->syncPermissions(['profile.edit', 'leaves.create', 'leaves.edit', 'knowledge_base.view']);

        //Customer role.
      //  $customerRole = Role::create(['name' => 'contact', 'type' => 'contact']);
       // $customerRole->syncPermissions(['profile.edit', 'tickets.create', 'tickets.view']);
    }
}
