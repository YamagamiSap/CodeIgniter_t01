<?php

/*
*  返信画面にて削除処理を実行する
*/
class Bbs_res_delete extends CI_Controller {

	function index() {

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		// 処理結果格納用
		$temp_t = "";

		// バリデーションチェックが成功なら更新処理をする
		if($this->form_validation->run("del_check")) {
			// アップデートモデルを呼び出す
			$this->load->model("bbs_test/bbsupdate","",TRUE);
			// デリートフラグを変更する
			$temp_t = $this->bbsupdate->delete_res();
		}

		// 検索モデル呼び出し
		$this->load->model("bbs_test/bbsselect","",TRUE);
		// infoテーブル検索実行
		$query = $this->bbsselect->select_res();
		// resテーブル検索実行
		$res_que = $this->bbsselect->select_res_all();

		$data["query_list"] = $query;
		$data["res_list"] = $res_que;
		$data["title"] = "掲示板-返信画面-";

		// 処理結果が存在した場合
		if( ! empty($temp_t) && $temp_t >= 0)
		{
			// 処理完了のメッセージを格納する
			$data["proc_mess"] = "該当の書込みを削除しました。";
		}

		// データを格納
		$this->load->vars($data);
		// キャッシュ制御
		$this->output->cache(0.01);
		// 画面表示のビューを呼び出し
		$this->load->view('bbs_test/bbsres');

	}


}

/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */