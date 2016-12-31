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
  int segundos_usuario;
  int horas, minutos, segundos, aux;

  // Pedimos al usuario los segundos que quiere transformar a h:m:s.
  cout << "Por favor, escriba el número de segundos: ";
  cin >> segundos_usuario;
  cout << endl;

  // Calculamos.
  horas = segundos_usuario / 3600;
  aux = segundos_usuario % 3600;
  minutos = aux / 60;
  segundos = aux % 60;

  // Mostramos el resultado.
  cout << segundos_usuario << " segundos son " << horas << "h " << minutos << "m "
       << segundos << "s " <<  endl;

  return 0;
}
