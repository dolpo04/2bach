#include <iostream>

using namespace std;
//Programa que pide 5 notas y calcula la nota media utilizando arrays
main()
{
	int nota[5]; //declaración del arrays de 5 int (5 enteros)
	int media=0; //variable de tipo entero para calcular la nota media
	int x; // variable contador

//pedimos las cinco notas de los examenes y las almacenamos en cada posición del array (de la 0 a la 4)
	for(x=0;x<5;x++)
	{
		cout <<"Escribe la nota del examen "<<x+1<<" ";
		cin >> nota[x];
	}
//para obtener la media sumamos todas las notas que tenemos almacendas en el array
	for (x = 0; x < 5; x++)
		media=media+nota[x];
//mostramos en pantalla la suma de la media divido entre 5, es decir, la media de las notas
	cout << "la media que has sacado es: "<<media/5<<endl;

	return 0;
}
