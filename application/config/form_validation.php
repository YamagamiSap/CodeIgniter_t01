<?php

// バリデーションチェックの項目を定義
$config = array(
	// 投稿画面にて使用
	'pos_check' => array(
		array(
			'field' => 'b_name',
			'label' => 'ユーザ名',
			'rules' => 'trim|required|min_length[1]|max_length[50]|xss_clean'
		),
		array(
			'field' => 'b_title',
			'label' => '題名',
			'rules' => 'trim|max_length[62]|xss_clean'
		),
		array(
			'field' => 'b_main',
			'label' => '内容',
			'rules' => 'trim|required|max_length[255]|xss_clean'
		),
		array(
			'field' => 'b_email',
			'label' => 'E-mail',
			'rules' => 'trim|valid_email|max_length[255]|xss_clean'
		),
		array(
			'field' => 'b_url',
			'label' => 'URL',
			'rules' => 'trim|prep_url|url_check|max_length[255]|xss_clean'
		),
		array(
			'field' => 'del_pass',
			'label' => 'Pass',
			'rules' => 'trim|numeric|max_length[4]|xss_clean'
		)
	),
	// 返信処理画面にて使用
	'res_check' => array(
		array(
			'field' => 'res_name',
			'label' => 'ユーザ名',
			'rules' => 'trim|required|min_length[2]|max_length[50]|xss_clean'
		),
		array(
			'field' => 'res_title',
			'label' => '題名',
			'rules' => 'trim|max_length[62]|xss_clean'
		),
		array(
			'field' => 'res_main',
			'label' => '内容',
			'rules' => 'trim|required|max_length[255]|xss_clean'
		),
		array(
			'field' => 'res_email',
			'label' => 'E-mail',
			'rules' => 'trim|valid_email|max_length[255]|xss_clean'
		),
		array(
			'field' => 'res_url',
			'label' => 'URL',
			'rules' => 'trim|prep_url|url_check|max_length[255]|xss_clean'
		),
		array(
			'field' => 'del_pass',
			'label' => 'Pass',
			'rules' => 'trim|numeric|max_length[4]|xss_clean'
		)
	),
	// 投稿画面-削除項目のチェック用
	'del_check' => array(
		array(
			'field' => 'select_no',
			'label' => '選択記事No',
			'rules' => 'trim|numeric|max_length[10]|xss_clean'
		),
		array(
			'field' => 'select_pass',
			'label' => '削除用Pass',
			'rules' => 'trim|numeric|max_length[4]|xss_clean'
		)
	)

);