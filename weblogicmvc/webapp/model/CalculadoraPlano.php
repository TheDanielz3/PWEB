<?php

    class CalculadoraPlano {

        function calculaPlano($credito, $numPrest)
        {
            $linha = 0;

            $data = date('d-m-Y');
            $diaSemana = date('l');
            $mensalidade = $credito / $numPrest;

            for ($linha = 0; $linha < $numPrest; $linha++) {
                $plano[$linha][0] = $data;
                $plano[$linha][1] = $mensalidade;
                $plano[$linha][2] = $diaSemana;
                $plano[$linha][3] = $credito - (($linha + 1) * $numPrest);
                $data + 1;
            }

            return $plano;
        }
    }
?>