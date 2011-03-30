<?php

/*
*  返信処理画面にてbbs_res_tblを更新する
*  bbs_info_tblに対してres_flagの更新処理を同時に行う
*/
class BbsInsertsub extends CI_Controller {


	function index() {

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');

		// res_flagを更新する
		$this->load->model('bbs_test/bbsupdate',"",TRUE);
		$this->bbsupdate->update_main();


		// バリデーションチェックが成功なら更新処理をする
		if($this->form_validation->run("res_check")) {
			$this->load->model("bbs_test/bbsinsert","",TRUE);
			$this->bbsinsert->insert_sub();
		}

		// DB接続用にMODELをロードする
		$this->load->model("bbs_test/bbsselect","",TRUE);
		$query = $this->bbsselect->select_res();
		// resテーブル検索実行
		$res_que = $this->bbsselect->select_res_id();

		$data["query_list"] = $query;
		$data["res_list"] = $res_que;
		$data["title"] = "返信画面";

		// データを格納
		$this->load->vars($data);

		// 投稿フォームあり画面に戻る
		$this->load->view('bbs_test/bbsres');
	}

}

/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */