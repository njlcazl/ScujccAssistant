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
            $data = $user->register($request);
            $stu_id = $data->username;
            $password = $data->password;
            $user = ['stu_id' => $stu_id, 'stu_pwd' => $password];
            $client = new Lcrawl('http://jwweb.scujcc.cn/', $user, false);
            $client->login();
            $all = $client->setUa('Lcrawl Spider V2.0.2')->getAll();
            $dealer = new ClassController();
            $dealer->dealClass($all['Schedule'], $stu_id);

            $dealer = new RankExamController();
            $dealer->dealRankExam($all['RankExam'], $stu_id);

            $dealer = new GradeController();
            $dealer->dealGrade($all['Grade'], $stu_id);
        }
        $ret_data = [
            'message' => 'success',
            'status_code' => '200'
        ];
        return $ret_data;
    }

    public function getClass(Request $request) {
        $this->validate($request, [
            'username' => 'required',
        ]);

        $retData = Classes::where('username', $request->get('username'))->get();

        return $this->collection($retData, new ClassesTransformer());
    }

    public function getGrade(Request $request) {
        $this->validate($request, [
            'username' => 'required',
        ]);

        $retData = Grades::where('username', $request->get('username'))->get();

        return $this->collection($retData, new GradesTransformer());
    }

    public function getRankExam(Request $request) {
        $this->validate($request, [
            'username' => 'required',
        ]);

        $retData = RankExam::where('username', $request->get('username'))->get();

        return $this->collection($retData, new RankExamTransformer());
    }
}