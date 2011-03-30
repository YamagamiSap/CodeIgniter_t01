<?php

/*
*  投稿ボタン押下時にbbs_info_tblに対して新規insert処理を実行する
*/
class CBbsInsert extends CI_Controller {


	function index() {

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		// バリデーションチェックが成功なら更新処理をする
		if($this->form_validation->run("pos_check")) {
			// DB接続用にMODELをロードする
			$this->load->model("bbs_test/bbsinsert","",TRUE);
			$this->bbsinsert->insert_main();
		}

		// 検索呼び出し
		$this->load->model("bbs_test/bbsselect","",TRUE);
		// モデルからテーブル検索実行
		$query = $this->bbsselect->select_main();
		// resテーブル検索実行
		$res_que = $this->bbsselect->select_res_all();

		$data["query_list"] = $query;
		$data["res_list"] = $res_que;
		$data['title'] = "掲示板-投稿-";
		$this->load->vars($data);
		// キャッシュ制御
		$this->output->cache(0.01);
		// 投稿フォームあり画面に戻る
		$this->load->view('bbs_test/bbsview');

	}



	function url_check($str) {
		if (preg_match('/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('url_check', '%s フィールドのURL形式が間違っています。');
			return FALSE;
		}
	}
}

/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */