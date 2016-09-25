#include <iostream>

using namespace std;

/* Programa para introducir la nota de Informática si la nota no es
correcta nos lo indica y nos la vuelve a pedir otra vez*/ 

main()
{
	int nota;

	cout<<"Introduzca la nota de Informática (Debes poner un númro entero): ";
	cin>>nota;

	while(nota<0 || nota>10) //la condición es compuesta. Si la nota es menor 0 o mayor de 10
	{ 			 // mensaje y pedimos otra vez la nota para volver a evaluarla
		cout<<nota<<" no es correcta!!!"<<endl;
		cout<<"Introduzca una nota correcta: ";
		cin>>nota;
	}
	cout<<"Has sacado un "<<nota<<" en Informatica..."<<endl;
	return 0;
}
