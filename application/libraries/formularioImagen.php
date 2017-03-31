<?php
if (! defined('BASEPATH')) exit ('No se permite acceso directo al script');
class FormularioImagen
{
    private $arr_formulario;
    public function __construct($arr)
            {
                $arrayDefault = array(
                'header'            => "",
                'colorHeader'       => "",
                'imageHeader'       => "imageBannerInicio",
                'nameField1'        => "",
                'placeHolder1'      => "",
                'nameField2'        => "",
                'placeHolder2'      => "",
                'habilitaCodigo'    => "0",
                'nameField3'        => "",
                'placeHolder3'      => "",
                'buttonSubmit'      => "",
                'colorButtonSubmit' => "",
                'action'            => "");
                $this->arr_formulario = $arr;
            }
    public function construirFormularioImagen()
            {
                $ret_form = "<form class=\"ui large form\" action=\"$action.php\" method=\"post\">";
                $ret_form.= "<div class=\"ui stacked segment\">";
                $ret_form.=           "<h2 class=\"ui $colorHeader image header\">";
                $ret_form.=              "<img src=\"./imagenes/$imageHeader.jpg\" class=\"image\">";
                $ret_form.=               "<div class=\"content\">";
                $ret_form.=                   $header;
                $ret_form.=               "</div>";
                $ret_form.=          "</h2><div class=\"field\">";
                $ret_form.=                "<div class=\"ui left icon input\">";
                $ret_form.=                 "<i class=\"user icon\"></i>";
                $ret_form.=                   "<input name=\"$nameField1\" placeholder=".$placeHolder1." type=\"text\">";
                $ret_form.=               "</div>";
                $ret_form.=            "</div>";
                $ret_form.=            "<div class=\"field\">";
                $ret_form.=                "<div class=\"ui left icon input\">";
                $ret_form.=                   "<i class=\"lock icon\"></i>";
                $ret_form.=                    "<input name=\"$nameField2\" placeholder=".$placeHolder2." type=\"password\">";
                $ret_form.=                "</div>";
                $ret_form.=            "</div>";
                if($habilitaCodigo == "1")
                {
                    $ret_form.=                      "<div class=\"field\">";
                    $ret_form.=                          "<div class=\"ui left icon input\">";
                    $ret_form.=                              "<i class=\"lock icon\"></i>";
                    $ret_form.=                              "<input name=\"$nameField3\" placeholder=".$placeHolder3." type=\"text\">";
                    $ret_form.=                          "</div>";
                    $ret_form.=                      "</div>";
                }
                $ret_form.=                      "<div class=\"ui fluid large $colorButtonSubmit submit button\" >$buttonSubmit</div>";
                $ret_form.=                  "</div>";
                $ret_form.=                  "<div class=\"ui error message\"></div>";
                $ret_form.=              "</form>";
            }
}
?>
