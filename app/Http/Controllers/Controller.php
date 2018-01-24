<?php

namespace App\Http\Controllers;

use App\Services\Teamwork\Models\Person;
use App\Services\Teamwork\Teamwork;
use GuzzleHttp\Client;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {

//        $teamwork = new Teamwork('faithpromisechurch', 'twp_nhJM5S8WeaVpQSaocXstr3A8WrAZ');
//
////        $person = $teamwork->people()->findByEmail('jodyk@faithpromise.org');
//
//        $person = $teamwork->people()->create(
//            (new Person())
//                ->setUserName('brad@bradroberts.net')
//                ->makeContact()
//                ->setFirstName('Fred')
//                ->setLastName('Flintstone')
//                ->setEmailAddress('brad@bradroberts.net'));
//
//        dd($person->toArray());

//        $project_id = 240564;
//        $person_id = 95928;
//        $company_id = 45052;
//
//        $client = new Client([
//            'base_uri' => 'https://faithpromisechurch.teamwork.com',
//            'auth'     => ['twp_nhJM5S8WeaVpQSaocXstr3A8WrAZ', 'X'],
//        ]);
//
//        dd(json_decode($client->get('/projects/240035.json?includePeople=true')->getBody()->getContents()));
//
//
//        $project = $client->post('/projects.json', [
//                'body' => json_encode([
//                        'project' => [
//                            'name'      => 'Test Project 5',
//                            'companyId' => $company_id,
//                            'people'    => '160648,95928',
//                        ],
//                    ]
//                ),
//            ]
//        );

//        dd($project->getBody()->getContents());

//

//        $data = json_decode((string)$project->getBody()->getContents());
//        dd($data);
//
//        // Use email to get person / company
//        $request = $client->post('/projects/240564/posts.json', [
//            'body' => json_encode([
//                'project' => [
//                    'name'      => 'Brad\'s Test Project',
//                    'companyId' => $company_id,
//                ],
//            ]),
//        ]);
//        $data = json_decode((string)$request->getBody()->getContents());
//
//        dd($data);


        return view('index');
    }
}
