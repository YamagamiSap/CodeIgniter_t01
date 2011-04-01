<?php

/*
*  投稿に対して返信を選択した場合に書き込みの検索処理を実行
*/
class BbsRes extends CI_Controller {

	function index() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');

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

