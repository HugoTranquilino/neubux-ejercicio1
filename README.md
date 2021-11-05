## Problema 1

Existe una técnica de encriptación que ocupa una agencia para poder enviar instrucciones a 
sus agentes. Para enviar una instrucción, la agencia transmite un mensaje donde la 
instrucción aparece entre otros caracteres. Por ejemplo la instrucción CeseAlFuego puede ser 
enviada como XcamakCeseAlFuegoDLKmN. Al recibir el mensaje, los agentes (con la ayuda de 
un libro con todas las instrucciones posibles) determinan cual es la instrucción escondida en el 
mensaje. Máximo existe una instrucción escondida por mensaje aunque es posible que no 
haya ninguna instrucción en el mensaje.
Desafortunadamente el transmisor que ocupan para el envío de los mensajes tiene una falla. 
En lugar de enviar los caracteres una sola vez, esta enviándolos una, dos o hasta tres veces. 
Por ejemplo, el mensaje anterior pudiera ser enviado así:
XXcaaamakkCCessseAAllFueeegooDLLKmmNNN. Esto hace que sea más difícil para los agentes 
el encontrar una instrucción. (Nota: Ninguna instrucción en el libro de instrucciones contiene 
dos letras iguales seguidas)
El programa recibe dos instrucciones y un mensaje, y el resultado debe ser si existe o no una 
instrucción escondida en el mensaje.