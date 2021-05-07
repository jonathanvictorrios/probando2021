function ResetearColoresFormulario()
{
    document.getElementById("txtNombreApellido").style.backgroundColor = "white";
    document.getElementById("numEdad").style.backgroundColor = "white";
    document.getElementById("txtConsulta").style.backgroundColor = "white";
    document.getElementById("selectDiaNac").style.backgroundColor = "white";
    document.getElementById("correo").style.backgroundColor = "white";
}

function validarEntero(num){
   
   var res;
   if(num>0){
        if (num % 1 == 0) {
            res=true;
        }
        else{
            res=false;
        }
   }
   else{
       res=false;
   }
    
    return res;
}
function controlarCorreo(){
    /*
    Contorlo el correo buscando que exita el arroba , pero ademas existan letras antes
    del arroba , luego controlo que existan letras antes de encontrar el punto , luego
    controlo que existan letras luego del punto , asi permito que se tengan distintos dominios
    */
    var Correo , i;
    var seValida , encontroArroba , encontroPunto;
    seValida=false;
    encontroArroba=false;
    encontroPunto=false;
    Correo=document.getElementById("correo").value;
    i=0;
    while(i<Correo.length && seValida==false){
        if(encontroPunto && i>posicionPunto){
            seValida=true;
        }
        else{
            if(encontroArroba){
                if(i>posicionArroba+1 && Correo.charAt(i)=='.'){
                    posicionPunto=i;
                    encontroPunto=true;
                }
            }
            else{
                if(i>0 && Correo.charAt(i)=='@'){
                    posicionArroba=i;
                    encontroArroba=true;
                }
            }
        }
        i++;
        
    }
    return seValida;
    
}
function controlarFecha(){
    var seValida=false;
    Dias=document.getElementById("selectDiaNac").value;
    Mes=document.getElementById("selectMesNac").value;
    Anio=document.getElementById("selectAnioNac").value;
    
        if(Mes==4 || Mes==6 || Mes==9 || Mes==11){
            

        
            if(Dias<=30){
                seValida=true;
            }
            
        }
        else{
            if(Mes==2){
                if(Anio % 4 == 0 && Anio % 100!=0){
                    //El año es bisiesto , por lo tanto
                    if(Dias<=29){
                        seValida=true;
                    }
                    
                }
                else{
                    if(Dias<=28){
                        seValida=true;
                    }
                    
                }
            }
            else{
                //si entra a este else significa que es uno de estos meses Enero, marzo, mayo, julio, agosto, octubre y diciembre.
                if(Dias<=31){
                    seValida=true;
                }
                
            }
    
        }

    return seValida;
    

}
function Validar()
{   
    
    var ControlAValidar;
    var seValida;
    seValida=true;
    
    ControlAValidar=document.getElementById("txtNombreApellido");
    if(ControlAValidar.value == ""){
        ControlAValidar.style.backgroundColor = "red";
        seValida=false;
    }
    ControlAValidar=controlarFecha();
    if(!ControlAValidar){
        ControlAValidar=document.getElementById("selectDiaNac");
        ControlAValidar.style.backgroundColor = "red";
        seValida=false;
    }
    ControlAValidar=document.getElementById("numEdad");
    if(ControlAValidar.value == "" || !validarEntero(ControlAValidar.value)){
        
        seValida=false;
    }
    ControlAValidar=document.getElementById("txtConsulta");
    if(ControlAValidar.value == ""){
        ControlAValidar.style.backgroundColor = "red";
        seValida=false;
    }
    ControlAValidar=document.getElementById("correo");
    if(ControlAValidar.value == "" || !controlarCorreo()){
        ControlAValidar.style.backgroundColor = "red";
        seValida=false;
    }

    

    return seValida;

}


function EnviarConsulta()
{
    
    ResetearColoresFormulario();
    var ResValidar;


    ResValidar= Validar();

    if(!ResValidad){
        return;
    }

}
function mostrar(id) {
   
    if (id == "siToco") {
        document.getElementById("preguntatipoGuitarraToca").style.display="table-row";
        document.getElementById("preguntacantAñosTocando").style.display = "table-row";
        document.getElementById("preguntaNivelConsidera").style.display = "table-row";
        document.getElementById("preguntaGuitarraLeGustaria").style.display ="none";
    }
    if (id == "noToco"){
        document.getElementById("preguntaGuitarraLeGustaria").style.display ="table-row";
        document.getElementById("preguntatipoGuitarraToca").style.display ="none";
        document.getElementById("preguntacantAñosTocando").style.display = "none";
        document.getElementById("preguntaNivelConsidera").style.display = "none";
    }
        
        
    
}