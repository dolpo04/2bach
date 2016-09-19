#include <iostream>

using namespace std;

/* programa que dada una nota (entera) de entrada, que guardaremos en la variable n,
   nos dice:
		SUSPENSO, SUFICIENTE, BIEN, NOTABLE O SOBRESALIENTE
	
*/ 

main()
{
	int nota;

	cout<<"Introduzca la nota (Debes poner un númro entero): ";
	cin>>nota;

	if(nota>=0 && nota<5) 
		cout<<"SUSPENSO"<<endl;
	
	else{
		switch(nota){
			case 5:
				cout<<"SUFICIENTE"<<endl;
				break;
			case 6:
				cout<<"BIEN"<<endl;
				break;
			case 7:
				cout<<"NOTABLE"<<endl;
				break;
			case 8:
				cout<<"NOTABLE"<<endl;
				break;
			case 9:
				cout<<"SOBRESALIENTE"<<endl;
				break;
			case 10:
				cout<<"MATRICULA DE HORNOR"<<endl;
				break;
			default:
				cout<<"NOTA INCORRECTA"<<endl;
		}
	}
}
