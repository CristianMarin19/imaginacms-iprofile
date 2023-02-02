<?php

namespace Modules\Iprofile\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Iprofile\Entities\Role;
use Modules\Isite\Entities\Module;

class IprofileModuleTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    
    $columns = [
      ["config" => "cmsPages", "name" => "cms_pages"],
      ["config" => "cmsSidebar", "name" => "cms_sidebar"],
      ["config" => "config", "name" => "config"],
      ["config" => "crud-fields", "name" => "crud_fields"],
      ["config" => "permissions", "name" => "permissions"],
      ["config" => "settings-fields", "name" => "settings"]
    ];
  
    $moduleRegisterService = app("Modules\Isite\Services\RegisterModuleService");
  
    $moduleRegisterService->registerModule("iprofile", $columns, 5);
  }
}