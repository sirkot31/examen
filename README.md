# Examen Técnico de Programación
Se debe desarrollar un programa que simule una lineas de producción, la cual grafique hora con hora la producción, en un horario de 6am a 4pm, con un plan de producción de 5000 piezas. (Grafique el plan y posible resultado).

Se debe capturar y almacenar en una base de datos `(Mysql)` la producción hora por hora. El ingreso del texto que se ingrese (simulando una etiqueta), con un código especifico contendrá la fecha (año, mes, dia), separados de un asterisco y un Hexadecimal, el cual deberás validar que sea único, ejemplo: `20210128*AFED34`

### Instrucciones

1. Descargar el proyecto de GIT.
2. Integrar VueJS en laravel usando el preset de VUE (laravel/ui)
3. La interfaz del usuario deberá ser como se muestra en la siguiente imagen:

![Plan de Producción](https://smkmx.com/wp-content/uploads/2022/01/ejemplo.png)

4. En el input `Escaneo` se ingresara el texto descrito arriba `20210128*AFED34` el cual deberá de validarse varios puntos:
a. Que tenga el formato `YYYYMMDD*HEXADECIMAL`.
b. Que sea único (Que en la base de datos no se repita).
c. Que valide que la fecha es del día actual.
5. Mostrar diálogos de los errores encontrados en la evaluación del texto ingresado (si los hay).
6. En la base de datos se deberá de guardar la cantidad que se genero hora por hora.
7. Graficar el hora por hora de las piezas producidas. 
8. Mostrar la cantidad actual producido.

### Cosas a considerar

1. Separar por componentes donde sea posible y justificable.
2. Se puede usar cualquier framework de CSS que desee para el desarrollo de la interfaz.
3. Usar las buenas practicas de cada framework a utilizar.
