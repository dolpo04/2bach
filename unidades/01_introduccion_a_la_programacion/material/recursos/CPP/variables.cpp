# include <iostream>

using namespace std ;

// cambiar el valor almacenado en una variable

int main () {
	cout<<"Dime valor para almacenar en la variable 'número' "<<endl;
	int numero; 
	cin>>numero;
	cout<<"el valor almacenado en 'número' es "<<numero<<endl;
	numero=numero*2;
	cout<<"he hecho un cambio en el valor almacenado y 'numero' es "<<numero<<endl;
	numero=numero+5;
	cout<<"ahora le he sumado al valor almacenado 5 y 'numero' es "<<numero<<endl;
	numero=0;
	cout<<"y ahora le he asignado el valor 0 a la variable"<<endl;
	cout<<"la variable 'numero' es "<<numero<<endl;
}
