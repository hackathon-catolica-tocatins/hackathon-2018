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
import BackgroundImageApp from '../components/BackgroundImageApp'


export default class Entrada extends React.Component {

    static navigationOptions = {
        header: null,
        gesturesEnabled: true
    }

    componentDidMount() {

        setTimeout(() => {
            this.props.navigation.navigate('Menu');

            //AsyncStorage.getItem("aceiteTermoUso").then((value) => {
            //
            //    if(value ==  null){
            //        this.props.navigation.replace('TermosUso',{fromScreen: 1 });
            //    }else{
            //        this.props.navigation.replace('Menu');
            //
            //    }
            //});

        } , 3000)
    }




    render() {
        var teste = Dimensions.get('window').height
        return (
            <View style={styles.containerMaster}>
                <StatusBarCustom/>

                <View style={styles.containerSec1}>

                    <View style={styles.subView}>
                        <Text style={styles.textSubView}>3º Hackathon - Católica do Tocantins</Text>
                        <Text style={styles.textSubView}>by Brunno Sales</Text>
                    </View>

                </View>
                <View style={styles.containerSec2}>
                    <BackgroundImageApp/>


                    <ActivityIndicator size={50} color="#606062" style={styles.load}/>
                    <Text style={styles.msgStatus}> Interagindo com você, aguarde por favor. </Text>

                </View>
                <View style={styles.viewLogo}>
                    <Image style={styles.logo} source={require('../../images/logo.png')}/>
                </View>
            </View>
        );
    }

}

const styles = StyleSheet.create({

    load: {
        marginBottom: 10

    },
    msgStatus:{

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
        backgroundColor: '#2C5871',
        paddingTop: 20,
    },
    subView:{
        position: 'absolute',
        width: '100%',
        paddingRight: 10,
        paddingTop: 5


    },
    textSubView:{
        fontSize: 14,
        color: '#DEDEE5',
        textAlign: 'center',


    },
    bgInitial:{
        position: 'absolute',
        width: Dimensions.get('window').width * .50,


    },
    containerSec2: {
        flex: 1,
        flexDirection: 'column',
        backgroundColor: '#F8991D',
        alignItems: 'center',
        justifyContent: 'flex-end' ,
        paddingBottom: 10

    },

    viewLogo:{
        width:'100%',
        height:'100%',
        position: 'absolute',
        justifyContent: 'center',
        alignItems: 'center',
    },
    logo:{

        height: 200,
        width: 200,

    },

});