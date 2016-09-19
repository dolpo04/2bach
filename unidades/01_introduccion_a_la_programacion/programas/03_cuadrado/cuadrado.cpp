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

int
main (int argc, char **argv)
{
  float lado, area, perimetro;

  // Pedimos el lado del cuadrado.
  cout << "Por favor, escriba el lado del cuadrado (en m): ";
  cin >> lado;
  cout << endl;

  // Mostramos el área y el perímetro.
  area = lado * lado;
  perimetro = lado * 4;
  cout << "Área: " << area << " m²" << endl;
  cout << "Perímetro: " << perimetro << " m" << endl;

  return 0;
}
