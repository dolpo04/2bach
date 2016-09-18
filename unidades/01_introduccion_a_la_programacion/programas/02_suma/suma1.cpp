/*
  Copyright (C) Román Ginés Martínez Ferrández <rgmf@riseup.net>

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
#include <iostream>

using namespace std;

/*
 * Programa que suma dos números y muestra el resultado por pantalla.
 */
int
main (int argc, char **argv)
{
  // Creo las variables que necesito.
  int num1, num2, resultado;

  // Asigno valores a las variables.
  num1 = 10;
  num2 = 8;

  // Sumo los valores de las variables num1 y num2.
  resultado = num1 + num2;

  // Muestro el resultado por pantalla.
  cout << "El resultado de la suma es: " << resultado << endl;

  return 0;
}
