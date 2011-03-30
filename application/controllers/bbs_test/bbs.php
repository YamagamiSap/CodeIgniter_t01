<?php

/*
*  初期読み込み用
*  画面表示関連のためにbbs_info_tblを読み込む
*/
class Bbs extends CI_Controller {

	function index() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');

		// 検索モデル呼び出し
		$this->load->model("bbs_test/bbsselect","",TRUE);
		// infoテーブル検索実行
		$query = $this->bbsselect->select_main();
		// resテーブル検索実行
		$res_que = $this->bbsselect->select_res_all();

		$data["query_list"] = $query;
		$data["res_list"] = $res_que;
		$data["title"] = "掲示板さんぷる";
		// データを格納
		$this->load->vars($data);
		// キャッシュ制御
		$this->output->cache(0.01);
		// 画面表示のビューを呼び出し
		$this->load->view('bbs_test/bbsview');
	}

}

/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */