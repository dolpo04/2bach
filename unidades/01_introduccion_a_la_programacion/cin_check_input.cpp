#include <iostream>
#include <limits>

using namespace std;

string lee_cadena()
{
  string nombre;
  getline(cin, nombre);
  return nombre;
}

int lee_entero()
{
  int n;

  while(!(cin >> n))
    {
      cout << "Valor incorrecto, por favor vuelva a introducir un número entero: ";
      cin.clear();
      cin.ignore(numeric_limits<streamsize>::max(), '\n');
    }
  cin.ignore(numeric_limits<streamsize>::max(), '\n');

  return n;
}

float lee_real()
{
  float n;
  string basura;

  while (!(cin >> n))
    {
      cout << "Valor incorrecto, por favor vuelva a introducir un número real: ";
      cin.clear();
      cin.ignore(numeric_limits<streamsize>::max(), '\n');
    }
  cin.ignore(numeric_limits<streamsize>::max(), '\n');

  return n;
}

int
main ()
{
  int n1, n2;
  float f1;
  string nombre;

  cout << "Escribe tu nombre: ";
  nombre = lee_cadena();

  cout << "Escribe un entero: ";
  n1 = lee_entero();

  cout << "Escribe otro entero: ";
  n2 = lee_entero();

  cout << "Escribe un número real: ";
  f1 = lee_real();

  cout << "Estos son los números " << nombre << ": " << n1 << " y " << n2 << " y " << f1 << endl;

  return 0;
}
