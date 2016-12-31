# include <iostream>
# include <string>
using namespace std ;

// esto es un comentario de una línea

int main () {
	cout<<"Hola, ¿como te llamas?  ";
	string nombre; 
	cin>>nombre; 
	cout<<"Hola, "<<nombre<<" ¿en qué año naciste?"<<endl;
	int nac;
	cin>>nac;
	cout<<nombre<<" con ese careto que tienes debes tener "<<2016-nac-1
	<<" o "<<2016-nac<<" años, según en que mes hayas nacido"<<endl; 
}
