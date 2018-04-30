import React from 'react';
import {
    StyleSheet,
    Text,
    View,
    Image,
    Dimensions,
    ActivityIndicator
} from 'react-native';
import StatusBarCustom from '../components/StatusBarCustom'
import BtnMenu from '../components/BtnMenu'
import BackgroundImageApp from '../components/BackgroundImageApp'
export default class Menu extends React.Component {

    static navigationOptions = {
        header: null,
        gesturesEnabled: true

    }

    componentDidMount() {
    }


    render() {
        var teste = Dimensions.get('window').height
        return (
            <View style={styles.containerMaster}>
                <StatusBarCustom/>
                <View style={styles.containerSec1}>

                </View>

                <View style={styles.containerSec2}>
                    <BackgroundImageApp/>
                    <Text style={styles.msgMenu}>Este aplicativo é uma ferramenta colaborativa, todas as informações aqui contidas, são de responsabilidade dos seus usuários.</Text>

                    <View style={styles.viewBtn}>

                        <BtnMenu titulo="Informar Situação" logo={require("../../images/menu1.png")}
                                 press={params => this.props.navigation.navigate('Categoria')}
                                 descricao="Comunique problemas de saúde, segurança e educação para que outras pessoas fiquem sabendo."></BtnMenu>

                        <BtnMenu titulo="Próximo de mim" logo={require("../../images/menu2.png")}
                                 press={params => this.props.navigation.navigate('MapaVisualizacao')}
                                 descricao="Navegue no mapa e saiba de problemas relatados por pessoas que se preocupam com você."></BtnMenu>





                    </View>


                </View>


                <View style={{flex: 1, position: 'absolute', width: '100%' }}>
                    <View style={styles.viewLogo}>
                        <Image style={styles.logo} source={require('../../images/logo.png')}
                               resizeMode={Image.resizeMode.contain}/>
                    </View>
                    <View style={{flex: 5 }}>

                    </View>
                </View>

            </View>
        );
    }

}

const styles = StyleSheet.create({

    viewBtn: {
        flexDirection: 'column',
        width: '100%',
        marginTop: 35,
        justifyContent: 'center',
        alignItems: 'center',

    },
    load: {
        marginBottom: 10
    },
    msgMenu: {
        textAlign: 'center',
        fontFamily: "browau",
        fontSize: 15,
        color: "#606062"
    },

    containerMaster: {
        flex: 1,
        flexDirection: 'column'
    },
    containerSec1: {
        flex: 1,
        backgroundColor: '#2c5871',
        elevation: 5,
        justifyContent: 'flex-end'
    },
    subView: {
        width: '100%',
        paddingRight: 10,
        paddingTop: 5
    },
    textSubView: {
        fontSize: 14,
        color: '#FFF',
        textAlign: 'right'

    },
    bgInitial: {
        height: Dimensions.get('window').height * .5,
        width: Dimensions.get('window').width * .5,
    },
    containerSec2: {
        flex: 6,
        flexDirection: 'column',
        backgroundColor: '#F8991D',
        alignItems: 'center',
        justifyContent: 'center',


    },

    viewLogo: {
        flex: 2,
        width: '100%',
        justifyContent: 'center',
        alignItems: 'center',
        elevation: 7,



    },
    logo: {
        height: 150,
        width: 150

    },

});