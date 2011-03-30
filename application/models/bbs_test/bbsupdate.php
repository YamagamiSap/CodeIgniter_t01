<?php

/*
*  テーブル更新処理を実行する
*/
class BbsUpdate extends CI_Model {

	/*
	*  更新処理・レスフラグを更新して返信あり状態にする
	*/
	function update_main() {

		// 更新する項目を定義
		$date = array(
			"res_flag"=>'1',
			"up_time"=>date("Y-m-d H:i:s")
		);

		// Resされた記事のＩＤを取得する
		$id = $this->input->post("res_id");

		// 返信記事が書かれた場合の処理
		$this->db->where("id", $id);
		$this->db->update("bbs_info_tbl", $date);

		// 処理された行数を返却
		return $this->db->affected_rows();

	}

	/*
	*  更新処理・削除フラグを更新して削除扱いにする
	*/
	function delete_main() {
		// 更新する項目を定義
		$date = array(
			"del_flag"=>"1",
			"up_time"=>date("Y-m-d H:i:s")
		);

		// 入力された記事データを取得
		$sel_no = $this->input->post("select_no");
		$sel_pass = $this->input->post("select_pass");

		// where句・and句を作成する
		$this->db->where("id", $sel_no);
		$this->db->where("del_pass", $sel_pass);
		$this->db->update("bbs_info_tbl", $date);

		// 処理された行数を返却
		return $this->db->affected_rows();
	}

	/*
	*  返信画面・更新処理・削除フラグを更新して削除扱いにする
	*/
	function delete_res() {
		// 更新する項目を定義
		$date = array(
			"del_flag"=>"1",
			"res_up_time"=>date("Y-m-d H:i:s")
		);

		// 入力された記事データを取得
		$sel_no = $this->input->post("select_no");
		$sel_pass = $this->input->post("select_pass");
		$sel_id = $this->input->post("sel_id");

		// where句・and句を作成する
		$this->db->where("no", $sel_no);
		$this->db->where("id", $sel_id);
		$this->db->where("del_pass", $sel_pass);
		$this->db->update("bbs_res_tbl", $date);

		// 処理された行数を返却
		return $this->db->affected_rows();
	}

}

/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */