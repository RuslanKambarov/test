<?php

namespace App\Console\Commands;

use Validator;
use Storage;
use App\Models\Category;
use ProductService;
use Illuminate\Console\Command;

class getFromJSON extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {        
        $category_list = json_decode(file_get_contents(public_path("categories.json")), true);
        $product_list = json_decode(file_get_contents(public_path("products.json")), true);

        foreach($category_list as $category){
            
            $validator = Validator::make($category, [
                "title" => ["required", "string", "min:3", "max:12"],
                "eId"   => ["required", "integer"]
            ]);

            if($validator->fails()){
                echo "error";
            }else{
                Category::create($category);
            }            
                        
        }

        foreach($product_list as $product){
            $validator = Validator::make($product, [
                "title"       => ["required", "string" , "min:3", "max:12"],
                "price"       => ["required", "numeric" , "min:0", "max:200"],
                "eId"         => ["required", "integer"],
                "categoryEId" => ["required", "array"]
            ]);

            if($validator->fails()){
                echo "error";
            }else{
                ProductService::create($product);
            }
            
        }        

        return $category_list;
    }
}
