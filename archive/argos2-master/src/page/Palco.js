import React from 'react';
import {
    StyleSheet,
    Text,
    View,
    Image,
    Dimensions,
    ActivityIndicator,
    TouchableOpacity
} from 'react-native';

import Icon from 'react-native-vector-icons/FontAwesome';
import BackgroundImageApp from '../components/BackgroundImageApp'


import StatusBarCustom from '../components/StatusBarCustom'


export default class Palco extends React.Component {

    constructor(props){

        super(props)

    }

    static navigationOptions = {
        header: null,
        gesturesEnabled: true
    }

    render() {
        var teste = Dimensions.get('window').height
        return (
            <View style={styles.containerMaster}>
                <StatusBarCustom/>
                <View style={styles.containerSec1}>

                    <Text style={styles.titulo}>{this.props.titulo} </Text>

                </View>
                <View style={styles.containerSec15}>
                    <View style={styles.viewLogo}>
                        <Image style={styles.logo} source={require('../../images/logo.png')} resizeMode={Image.resizeMode.contain}/>
                    </View>
                </View>
                <View style={styles.containerSec2}>
                    <BackgroundImageApp/>

                    {this.props.children}

                </View>
                <View style={styles.containerSec3}>
                    <TouchableOpacity onPress={()=> this.props.back()}>
                        <Image source={require("../../images/botao_voltar.png")} style={styles.logo} resizeMode="contain"/>
                    </TouchableOpacity>

                    <TouchableOpacity onPress={()=> this.props.go()}>
                        <Image source={require("../../images/botao_proximo.png")} style={styles.logo} resizeMode="contain"/>
                    </TouchableOpacity>
                </View>
            </View>
        );
    }

}

const styles = StyleSheet.create({



    titulo:{

        paddingBottom: 20,
        position: 'absolute',
        elevation: 10,
        fontFamily: "browau",
        fontSize: 20,
        color: "#fff",
        paddingLeft: 20,
        fontWeight: '500'

    },

    load: {
        marginBottom: 10

    },
    msgStatus:{

        fontFamily: "browau",
        fontSize: 20,
        color: "#606062"
    },
    credito:{
        fontSize: 20,
        color: "#fff"
    },

    containerMaster: {
        flex: 1,
        flexDirection: 'column'
    },
    containerSec1: {
        flex: 2,
        flexDirection:'column',
        backgroundColor:'#2c5871',
        elevation: 15,
        justifyContent: 'flex-end'
    },
    containerSec3: {
        flex: 1,
        flexDirection: 'row',
        backgroundColor: '#2c5871',

        justifyContent: 'space-around',
        alignItems: 'center'

    },
    containerSec15: {
        position: 'absolute',
        width:'100%',
        flex: 1,
        elevation: 25 ,
        justifyContent: 'flex-end',
        alignItems:'flex-end'
    },
    subView:{
        position: 'absolute',
        width: '100%',
        paddingRight: 10,
        paddingTop: 5


    },
    textSubView:{
        fontSize: 14,
        color: '#FFF',
        textAlign: 'right'

    },

    containerSec2: {
        flexDirection: 'column',
        flex: 12,
        backgroundColor: '#f8991d',
    },

    viewLogo:{

        margin : 20,

    },
    logo:{
        height: 80,
        width: 80

    },

});