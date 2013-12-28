<?php

class FAHelperUtils
{
	/*
	 * Generate a random alphanumeric string with provided length
	 */
	public static function randomToken($length =10)
	{
		$random= "";
		
		srand((double)microtime()*1000000);
		
		$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
		$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
		$data .= "0FGH45OP89";
		
		for($i = 0; $i < $length; $i++){
			$random .= substr($data, (rand()%(strlen($data))), 1);
		}
		
		return $random;
	}
	
	/*
	 * Validated whether provided email address is valid or not
	 * @return True on valid email else false
	 */
	public static function isEmailAddress($email)
	{
		// Split the email into a local and domain
		$atIndex = strrpos($email, "@");
		$domain = substr($email, $atIndex + 1);
		$local = substr($email, 0, $atIndex);

		// Check Length of domain
		$domainLen = strlen($domain);
		if ($domainLen < 1 || $domainLen > 255)
		{
			return false;
		}

		/*
		 * Check the local address
		 * We're a bit more conservative about what constitutes a "legal" address, that is, A-Za-z0-9!#$%&\'*+/=?^_`{|}~-
		 * Also, the last character in local cannot be a period ('.')
		 */
		$allowed = 'A-Za-z0-9!#&*+=?_-';
		$regex = "/^[$allowed][\.$allowed]{0,63}$/";
		if (!preg_match($regex, $local) || substr($local, -1) == '.')
		{
			return false;
		}

		// No problem if the domain looks like an IP address, ish
		$regex = '/^[0-9\.]+$/';
		if (preg_match($regex, $domain))
		{
			return true;
		}

		// Check Lengths
		$localLen = strlen($local);
		if ($localLen < 1 || $localLen > 64)
		{
			return false;
		}

		// Check the domain
		$domain_array = explode(".", rtrim($domain, '.'));
		$regex = '/^[A-Za-z0-9-]{0,63}$/';
		foreach ($domain_array as $domain)
		{

			// Must be something
			if (!$domain)
			{
				return false;
			}

			// Check for invalid characters
			if (!preg_match($regex, $domain))
			{
				return false;
			}

			// Check for a dash at the beginning of the domain
			if (strpos($domain, '-') === 0)
			{
				return false;
			}

			// Check for a dash at the end of the domain
			$length = strlen($domain) - 1;
			if (strpos($domain, '-', $length) === $length)
			{
				return false;
			}
		}

		return true;
	}
	
}