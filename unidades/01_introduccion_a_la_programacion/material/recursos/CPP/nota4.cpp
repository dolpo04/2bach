#include <iostream>

using namespace std;

/* Programa para introducir la nota de Informática si la nota no es
correcta nos lo indica y nos la vuelve a pedir otra vez*/

main()
{
	int nota;

	do
	{
		cout<<"Introduzca la nota de Informática (Debes poner un númro entero): ";
		cin>>nota;

		if(nota<0 || nota>10) //comprobamos si la nota es correcta
			cout<<nota<<" no es correcta!!!"<<endl;
		}while(nota<0 || nota>10);

	cout<<"Has sacado un "<<nota<<" en Informatica..."<<endl;
	return 0;
}
