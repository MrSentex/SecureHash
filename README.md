# SecureHash v0.1

SecureHash by MrSentex.

## What is SecureHash?

SecureHash is a program to protect data in your server such as passwords, usernames, emails, etc... This program makes a pre hash which is equals to the addition or rest of the ascii number value of each character of the string that you passed to the function `Hash`. This pre hash will be added to a string who will contain:  
  
`A text of your choice without hashing + Separation character of your choice + The pre hash hashed or not by the algorithm you specified in config + Separation character of your choice + The string you want to hash encoded in base64.`
  
This string would be hashed in the algorithm you specified in the config as the algorithm of the pre hash.

## How to use it?

It is easy to start using SecureHash, even for the beginners in PHP. If you are a experimented developer in PHP or a crazy beginner you can modify the program. It is very easy to do it; you just need to edit `SecureHash.php` and overwrite the private values at the top of the script. If you do not want to modify anything you can use the default configuration (It is pretty strong anyway).

With the script already configured you only need to include `SecureHash.php` in the script you want and start using it calling to the class: `SecureHash`. You have two available functions:

#### Hash(string => data you want to hash)  

This function returns the hashed value of the data you passed in the $string parameter.

#### verifyHash(string => data you want to verify, string => hashed value you want to verify)  

This function returns `true` or `false`.

If the hashed data is equal to the hashed parameter, it will return `true`. If not, the function will return `false`.

There is a little example:    
```php
<?php

include("SecureHash.php") ;

// If you change the name of the program file you must need to change the include.
// If you put the file in another path of the script you are calling it you will need to add the path in the include.

$SecureHash = new SecureHash();
$word = "admin";

$hash = $SecureHash->Hash($word);
$verify = $SecureHash->verifyHash($word, $hash);

echo "Hash: " . $hash . "\n";
echo "Verify: " . $verify . "\n";

?>
```

## Warning

If you change the config of the program when you have already started using it, the output of the functions: `Hash` and `verifyHash` can vary, so that the script which is using SecureHash could not work correctly.
