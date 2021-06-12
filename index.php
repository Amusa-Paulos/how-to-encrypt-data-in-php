<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to encrypt data in PHP</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="lesson-title">
        <div class="lesson-title-inner">
            <h3>How to encrypt data in PHP</h3>
        </div>
    </div>
    <?php
        // openssl_encrypt ( 
        //     string $data , 
        //     string $cipher_algo , 
        //     string $passphrase , 
        //     int $options = 0 , 
        //     string $iv = "" , 
        //     string &$tag = null , 
        //     string $aad = "" , 
        //     int $tag_length = 16 
        // );

        // openssl_decrypt ( 
        //     string $data , 
        //     string $cipher_algo , 
        //     string $passphrase , 
        //     int $options = 0 , 
        //     string $iv = "" , 
        //     string $tag = "" , 
        //     string $aad = "" 
        // );

        function paulos_ab_encrypt($data)
        {
            $cipher = 'aes-128-ctr';
            // $cipher = 'aes-128-gcm';
            $key = 'paulos_ab9uiuyvivbiyvvvyvvvyvyv_encrypted_this926581$ukkbv';
            $options = 0;
            $iv_cipher = openssl_cipher_iv_length($cipher);
            // $iv = openssl_random_pseudo_bytes($iv_cipher);
            $iv = 'g8s92jpaulos_ab6';
            $tag = 'GCM';
            $aad = '';
            $tag_length = 16;
            return openssl_encrypt($data, $cipher, $key, $options, $iv);
        }

        function paulos_ab_decrypt($encrypted_data)
        {
            $cipher = 'aes-128-ctr';
            // $cipher = 'aes-128-gcm';
            $key = 'paulos_ab9uiuyvivbiyvvvyvvvyvyv_encrypted_this926581$ukkbv';
            $options = 0;
            $iv_cipher = openssl_cipher_iv_length($cipher);
            // $iv = openssl_random_pseudo_bytes($iv_cipher);
            $iv = 'g8s92jpaulos_ab6';
            $tag = 'GCM';
            $aad = '';
            return openssl_decrypt($encrypted_data, $cipher, $key, $options, $iv);
        }

        $encrypted_data = '';
        $decrypted_data = '';
        if (isset($_POST['data'])) {
            $data = $_POST['data'];
            $encrypted_data = paulos_ab_encrypt($data);
            
            $decrypted_data = paulos_ab_decrypt($encrypted_data);
        }

        

        // echo var_dump(openssl_get_cipher_methods());
    ?>
    <div class="lesson-body">
        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <textarea name="data" id="data" cols="30" rows="10" placeholder="enter data to be encrypted here"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="lesson-inner">
            <div class="lesson-left">Encypted Data</div>
            <div class="lesson-right"><?php echo $encrypted_data == '' ? 'Encypted data is displayed here' : $encrypted_data; ?></div>
        </div>
        <div class="lesson-inner">
            <div class="lesson-left">Real Decrypted Data</div>
            <div class="lesson-right"><?php echo $decrypted_data == '' ? 'real data is displayed here' : nl2br($decrypted_data); ?></div>
        </div>
        
    </div>
</body>
</html>