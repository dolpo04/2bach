#include <iostream>

using namespace std;

/* programa que dada una nota de entrada, que guardaremos en la variable n,
   nos dice:
	Si la nota es menor que 5 y mayor que cero nos dice que es SUSPENSO.
	Si la nota es mayor o igual que 5 y menor o igual que 10 APROBADO
	En otro caso nos dice que la nota es INCORRECTA
*/ 

main()
{
	int n;

	cout<<"Introduzca la nota: ";
	cin>>n;

	if(n>=0 && n<5) 
		cout<<"SUSPENSO"<<endl;
	
	else if(n>=5 && n<=10)
		cout<<"APROBADO"<<endl;
	else 
		cout<<"la nota es INCORRECTA"<<endl;
	
}
