<?php
class MyValidationRules
{
	// 改行コードやタブが含まれていないかの検証ルール
	public static function _validation_no_tab_and_newline($value)
	{
		if (preg_match('/\A[^\r\n\t]*\z/u', $value) === 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}