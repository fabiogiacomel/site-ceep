<?php
function isApi()
{
    if (request()->is('api/*'))
        return true;
    return false;
}

function retorno($message, $code, $redirect = null)
{
    if (isApi()) {
        if ($code != 200) {
            return response()->json([
                'status' => 'error',
                'message' => $message
            ], $code);
        }
        return response()->json([
            'status' => 'success',
            'message' => $message
        ], 200);
    }

    if ($code != 200) {
        if ($message instanceof \Illuminate\Support\MessageBag) {
            $messages = "<ul>";
            //dd($message);
            foreach ($message->messages() as $message) {
                foreach ($message as $m) {
                    $messages .= "<li>" . $m . "</li>";
                }
            }
            $messages .= "</ul>";
            //dd($messages);
            toastr()->error($messages);
        } else {
            toastr()->error($message);
        }
        if (!$redirect)
            return back()->withInput(request()->input());

        return redirect($redirect);
    }

    toastr()->success($message);
    if (!$redirect)
        return back();
    return redirect($redirect);
}

function user_name()
{
    if (isApi()) {
        if (auth('api')->guest()) {
            return "Usuário não logado";
        } else {
            return auth('api')->user()->name;
        }
    } else {
        if (auth('web')->guest()) {
            return "Usuário não logado";
        } else {
            return auth('web')->user()->name;
        }
    }
}
/**
 * Arquivo de Helpers funções úteis para o dia-a-dia
 */

/**
 * formatDateAndTime formata a data no padrão informado.
 *
 * @param  DateTime $value
 * @param  String $format default dd/mm/aaaa
 * @return String DataFormatada
 * Uso {{ formatDateAndTime('2018-12-24', 'd/m/Y') }}
 */
function formatDateAndTime($value, $formatOutput = 'd/m/Y', $formatInput = 'Y-m-d')
{
   //$x = \Carbon\Carbon::createFromFormat($formatInput, substr($value,0,10));
   $x = substr($value,0,10);
   $newDate = date("d/m/Y", strtotime($x));
   return $newDate;
}

/**
 * Remove a acentuação do tsxto.
 *
 * @param  String $text
 * @return String texto sem acentuação
 *
 *   {{ removeAcentos('André') }}
 */
function removeAcentos($text)
{
    //$string = 'ÁÍÓÚÉÄÏÖÜËÀÌÒÙÈÃÕÂÎÔÛÊáíóúéäïöüëàìòùèãõâîôûêÇç';
    //Substitua pela string que desejas converter
    return preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $text));
    //Irá exibir "AIOUEAIOUEAIOUEAOAIOUEaioueaioueaioueaoaioueCc"
}

function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}
/**
 * Converte número do formato brasileiro para americano
 * @param string $num
 */
function bra2eua($num)
{
    //   $num = str_replace(".", "", "$num");
    $num = str_replace(",", ".", "$num");
    return $num;
}

/**
 * Converte número do formato americano para brasileiro
 * @param string $num
 */
function eua2bra($num)
{
    //pode utilizar number_format aqui...
    $num = str_replace(",", "", "$num");
    $num = str_replace(".", ",", "$num");
    return $num;
}
