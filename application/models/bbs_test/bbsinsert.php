<?php

/*
*  テーブル挿入処理を実行する
*/
class BbsInsert extends CI_Model {


	/*
	*  新規投稿時のインサート処理
	*/
	function insert_main() {

		$pass = $this->input->post("del_pass");
		// 編集用のパスコードが未入力ならデフォルト値入力
		if(empty($pass)){
			$pass = "0000";
		}

		//更新するデータを取得する
		$data = array(
			"name"=>$this->input->post("b_name"),
			"title"=>$this->input->post("b_title"),
			"body"=>$this->input->post("b_main"),
			"mail"=>$this->input->post("b_email"),
			"url"=>$this->input->post("b_url"),
			"del_pass"=>$pass,
			"up_time"=>date("Y-m-d H:i:s")
		);

		// DBの更新処理をする
		$this->db->insert("bbs_info_tbl", $data);
	}

	/*
	*  投稿に対する返信投稿時のインサート処理
	*/
	function insert_sub() {

		$pass = $this->input->post("del_pass");
		if(empty($pase)) {
			$pase = "0000";
		}

		$data = array(
			"id"=>$this->input->post("res_id"),
			"res_name"=>$this->input->post("res_name"),
			"res_title"=>$this->input->post("res_title"),
			"res_body"=>$this->input->post("res_main"),
			"res_mail"=>$this->input->post("res_email"),
			"res_url"=>$this->input->post("res_url"),
			"del_pass"=>$pass,
			"res_up_time"=>date("Y-m-d H:i:s")
		);

		// DBの更新処理をする
		$this->db->insert("bbs_res_tbl", $data);
	}

}


