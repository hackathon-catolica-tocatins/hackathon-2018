import {StackNavigator} from 'react-navigation';

import Entrada from './Entrada';
import Mapa from './Mapa';
import Menu from './Menu';
import Galeria from './Galeria';
import Categoria from './Categoria';
import SubCategoria from './SubCategoria';
import Finalizacao from './Finalizacao';
import MapaVisualizacao from './MapaVisualizacao';
import Detalhes from './Detalhes';

import getSlideFromRightTransition from 'react-navigation-slide-from-right-transition';


console.disableYellowBox = true;

export default StackNavigator({
    Entrada: {screen: Entrada},
    MapaVisualizacao: {screen: MapaVisualizacao},
    Detalhes: {screen: Detalhes},
    Finalizacao: {screen: Finalizacao},
    Categoria: {screen: Categoria},
    SubCategoria: {screen: SubCategoria},
    Menu: {screen: Menu},
    Galeria: {screen: Galeria},
    Mapa: {screen: Mapa},

}, {
    transitionConfig: getSlideFromRightTransition
});


