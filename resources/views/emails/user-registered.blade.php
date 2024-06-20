<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Adicione estilos de cabeçalho */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #001f3f; /* Azul escuro */
            color: #ffffff;
        }

        /* Adicione estilos para centralizar a imagem */
        .center-image {
            text-align: center;
        }

        .center-image img {
            display: inline-block;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="2"><span class="center-image"><img src="{{asset('img/logo-dvelopers.png')}}" alt="Logo" width="100"></span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><p>&nbsp;</p>
                <p>Olá {{ $data['name'] }},</p>
                <p>Seja bem vindo.</p></td>
                <td class="center-image">&nbsp;</td>

            </tr>
            <tr>
                <td colspan="2">
                    <p>Suas informações de acesso foram cadastradas com sucesso!</p>
                    <p>

                        <strong>Link:</strong> {{ route('admin.index') }}<br>
                        <strong>E-mail:</strong> {{ $data['email'] }}<br>
                        <strong>Senha:</strong> {{ $data['password'] }}
                    </p>
                    <p>
                        Faça login no sistema para começar a utilizar nossos serviços.
                    </p>
                   
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
