#include <iostream>

using namespace std;
//Programa que escriber numeros en pantalla del 0 al 10
main()
{
	int x;
	int dato;

	cout << "¿Hasta dónde quieres contar? ";
	cin>>dato;

	for(x=0;x<dato;x++)
		cout <<" "<<x; //escribe un espacio y luego el número
	cout << endl; // cuando sale del for hacemos un salto de línea
	return 0;
}
