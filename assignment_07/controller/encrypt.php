<?php


class Encrypt
{
    public function md5Encrypt($str) {
        return $md5_encrypt = md5($str);
    }

    public function sha1Encrypt($str) {
        return $sha1_encrypt = sha1($str);
    }

    public function encryptSHA1ToMD5($str) {
        return $encrypt = $this->md5Encrypt($this->sha1Encrypt($str));
    }
}

/*
 * MD5: 32 character;   SHA1: 40 character
 *
 * MD5:		12345 <-> 827ccb0eea8a706c4c34a16891f84e7b <-> 1f32aa4c9a1d2ea010adcf2348166a04
 * SHA1:		12345 <-> 8cb2237d0679ca88db6464eac60da96345513964 <-> 5e9795e3f3ab55e7790a6283507c085db0d764fc
 * MD5-SHA1:	12345 <-> 827ccb0eea8a706c4c34a16891f84e7b <-> fe703d258c7ef5f50b71e06565a65aa07194907f
 * SHA1-MD5:	12345 <-> 8cb2237d0679ca88db6464eac60da96345513964 <-> b714337aa8007c433329ef43c7b8252c
*/
?>