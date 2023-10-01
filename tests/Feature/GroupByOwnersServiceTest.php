<?php

namespace Tests\Feature;

use App\Services\GroupByOwnersService;
use Tests\TestCase;

class GroupByOwnersServiceTest extends TestCase
{
    public function testGroupByOwners()
    {
        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B"
        ];

        $expectedResult = [
            "Company A" => ["insurance.txt", "letter.docx"],
            "Company B" => ["Contract.docx"]
        ];

        $service = new GroupByOwnersService();
        $result = $service->groupByOwners($files);

        if ($result === $expectedResult){
            echo "Test passed";
        }
        else{
            echo "Test failed";
        }

        $this->assertEquals($expectedResult, $result);
    }
}
