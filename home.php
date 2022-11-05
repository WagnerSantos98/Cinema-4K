<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site - Principal</title>

    <style>
        
        *{
            box-sizing: border-box;
            outline: none!important;
        }
        body{
            font-size: 62.5%;
            position: relative;
            width: 100%;
            z-index: 90;
        }
        header{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 60;
            background-color: #101010;
            overflow: unset;
            position: relative;
        }
        header .container{
            height: 64px;
            display: flex;
            position: relative;
            z-index: 20;
        }
        .container{
            width: 1220px;
            margin: 0 auto;
        }
        header .container .container-toogle{
            height: 100%;
            display: flex;
            align-items: center;
        }
        .container-toogle{
            position: relative;
        }
        a{
            text-decoration: none;
        }
        .boas-vindas{
            max-width: 1901px;
            height: 100vh;
            margin: 0 auto;
            background-color: #1a1a1a;
        }
        .boas-vindas .container{
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 30;
            width: 488px;
            margin: 0;
        }
        .boas-vindas .container .container-header{
            height: 148px;
            background: #262d31;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            background-image: url();
            border-radius: 8px 8px 0 0;
        }
        .boas-vindas .container .container-body{
            border-radius: 0 0 8px 8px;
            padding: 41px 71px 62px 72px;
            background-color: #fff;
        }
        .boas-vindas .container .container-body .container-text-select h1{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 140%;
            color: #262d31;
            margin-bottom: 34px;
        }
        .boas-vindas .container .container-body .container-text-select span{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 140%;
            color: #828282;
        }
        .boas-vindas .container .container-body .container-text-select .container-select{
            margin-bottom: 32px;
            width: 100%;
        }
        .container-select{
            position: relative;
            margin-left: auto;
        }
        .boas-vindas .container .container-body .container-text-select .container-select select{
            width: 100%;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            padding-left: 32px;
            padding-right: 16px;
            margin-top: 11px;
        }
        .container-select select{
            background: #fff;
            border-radius: 8px;
            width: 277px;
            height: 58px;
            display: flex;
            align-items: center;
            padding-left: 35px;
            padding-right: 40px;
            position: relative;
            cursor: pointer;
        }
        .boas-vindas .container .container-body .container-text-select .container-select .container-text span {
            margin-left: 16px;
        }       
        input{
            outline: none;
        }
        .boas-vindas .container .container-body .container-text-select .container-select select{
            background-color: #fff;
            top: 50%;
        }

        select{
            display: block;
            list-style-type: disc;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 40px;
        }
        .boas-vindas .container .container-body .container-text-select .btn-acessar{
            width: 100%;
        }
        .btn-acessar{
            margin-top: 25px;
            background-color: red;
            border-radius: 6px;
            border: none;
            font-family: Inter;
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 140%;
            letter-spacing: .02em;
            color: #fff;
            width: 269px;
            height: 51px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        section{
            display: block;
        }

        @media (max-width: 1366px){
            .container{
                width: 90%;
            }
        }
        
    </style>
</head>
<body>
    <!--Header-->
    <div class="container-header">
        <div class="container-toogle">
            <a href="#"><img src="" alt=""></a>
        </div>
        <div class="menu">

        </div>
    </div>

    <!--Content-->
    <div id="boas-vindas">
        <section class="boas-vindas">
            <div class="container">
                <div class="container-header">
                    <img src="" alt="">
                    <img src="" alt="">
                    
                </div>
                <div class="container-body">
                    <div class="container-text-select">
                        <h1>Seja bem-vindo, é um prazer ter você aqui!</h1>
                        <span>Selecione o que deseja</span>
                        <div class="container-select" id="select-novo">
                            <div class="container-text">
                                <select name="" id="" class="scroll" onchange="window.location.href=this.value;">
                                    <option selected disabled>Selecione...</option>
                                    <option value="./content/homepage.php">Cinema</option>
                                    <option value="./content/homepage.php">Show</option>
                                    <option value="./content/homepage.php">Teatro</option>
                                </select>
                                
                            </div>
                            <a href="" class="btn-acessar">Acessar</a>
                        </div>
                    </div>
                </div>
                <!--Background-->
                <div class="container-img">
                    <img src="" alt="">
                </div>
            </div>
        </section>
    </div>

    <!--Footer-->


    <!--Script Select-->

</body>
</html>