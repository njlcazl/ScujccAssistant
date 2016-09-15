<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/11
 * Time: 下午1:41
 */

namespace App\Api\Controllers;

use App\Api\Transformers\ClassesTransformer;
use App\Api\Transformers\GradesTransformer;
use App\Api\Transformers\RankExamTransformer;
use App\Classes;
use App\Grades;
use App\RankExam;
use Lndj\Lcrawl;
use Illuminate\Http\Request;

class FetchDataController extends BaseController
{
    public function init(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = new UsersController();

        $exist = $user->isExist($request->get('username'));
        if(! $exist) {
            $stu_id = $request->get('username');
            $password = $request->get('password');
            $user_data = ['stu_id' => $stu_id, 'stu_pwd' => $password];
            $client = new Lcrawl('http://jwweb.scujcc.cn/', $user_data, false);
            $client->login();
            $all = $client->setUa('Lcrawl Spider V2.0.2')->getAll();
            if ($all['Schedule'] == null || $all['RankExam'] == null || $all['Grade'] == null) {
                $status = [
                    'message' => 'failed',
                    'status_code' => '403'
                ];
                return [
                    'status' => $status
                ] ;
            }
            $dealer = new ClassController();
            $dealer->dealClass($all['Schedule'], $stu_id);

            $dealer = new RankExamController();
            $dealer->dealRankExam($all['RankExam'], $stu_id);

            $dealer = new GradeController();
            $dealer->dealGrade($all['Grade'], $stu_id);

            $user->register($request);
        }
        $status = [
            'message' => 'success',
            'status_code' => '200'
        ];
        return [
            'status' => $status
        ];
    }

    public function getClass(Request $request) {
        $this->validate($request, [
            'username' => 'required',
        ]);

        $ClassData = Classes::where('username', $request->get('username'))->get();

        if ($ClassData->count() == 0) {
            $status = [
                'message' => 'failed',
                'status_code' => '404'
            ];
            return [
                'status' => $status
            ];
        }
        $status = [
            'message' => 'success',
            'status_code' => '200'
        ];
        $transformer = new ClassesTransformer();
        $retData = [
            'status' => $status,
            'data' => $transformer->transformCollection($ClassData->toArray())
        ];
        return $retData;
    }

    public function getGrade(Request $request) {
        $this->validate($request, [
            'username' => 'required',
        ]);

        $GradeData = Grades::where('username', $request->get('username'))->get();
        if ($GradeData->count() == 0) {
            $status = [
                'message' => 'failed',
                'status_code' => '404'
            ];
            return [
                'status' => $status
            ];
        }
        $status = [
            'message' => 'success',
            'status_code' => '200'
        ];
        $transformer = new GradesTransformer();
        $retData = [
            'status' => $status,
            'data' =>  $transformer->transformCollection($GradeData->toArray())
        ];
        return $retData;
    }

    public function getRankExam(Request $request) {
        $this->validate($request, [
            'username' => 'required',
        ]);

        $RankExamData = RankExam::where('username', $request->get('username'))->get();
        if ($RankExamData->count() == 0) {
            $status = [
                'message' => 'failed',
                'status_code' => '404'
            ];
            return [
                'status' => $status
            ];
        }
        $status = [
            'message' => 'success',
            'status_code' => '200'
        ];
        $transformer = new RankExamTransformer();
        $retData = [
            'status' => $status,
            'data' => $transformer->transformCollection($RankExamData->toArray())
        ];
        return $retData;
    }
}