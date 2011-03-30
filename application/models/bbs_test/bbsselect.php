<?php

/*
*  テーブル検索処理を実行する
*/
class BbsSelect extends CI_Model {


	/*
	*  bbs_info_tblを降順にて全件検索する
	*/
	function select_main() {
		// 検索句にorder by句を付属する
		$this->db->order_by("id", "desc");
		$this->db->where("del_flag", "0");
		// テーブルを検索する
		$query = $this->db->get("bbs_info_tbl");

		return $query;
	}

	/*
	*  返信用に返信対照の書込みのみを取得する
	*/
	function select_res() {

		// GETからIDを取得する
		$id = $this->input->get("id");
		if(empty($id)){
			$id = $this->input->post("res_id");
		}
		if(empty($id)){
			$id = $this->input->post("sel_id");
		}

		// 検索句にwhere条件を追加する
		$this->db->where("id", $id);
		// テーブルを検索する
		$query = $this->db->get("bbs_info_tbl");

		return $query;
	}

	/*
	*  bbs_res_tblテーブルを全件取得する
	*/
	function select_res_all() {
		// 検索句に削除フラグの無いものを指定する
		$this->db->where("del_flag", "0");
		// resテーブルを検索する
		$query = $this->db->get("bbs_res_tbl");

		return $query;
	}

	/*
	*  bbs_res_tblテーブルを取得したＩＤで全件検索をかける
	*/
	function select_res_id() {
		// GETからIDを取得する
		$id = $this->input->get("id");
		if(empty($id)){
			$id = $this->input->post("res_id");
		}

		// 検索句にwhere条件を追加する
		$this->db->where("id", $id);
		// 検索句に削除フラグの無いものを指定する
		$this->db->where("del_flag", "0");
		// resテーブルを検索する
		$query = $this->db->get("bbs_res_tbl");

		return $query;
	}

}

/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */