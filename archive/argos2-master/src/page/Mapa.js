import React from 'react';
import {
    StyleSheet,
    Text,
    View,
    Image,
    Dimensions,
    ActivityIndicator,
    TouchableOpacity,
    Button
} from 'react-native';

import BtnVaiVolta from '../components/BtnVaiVolta'

import MapView from 'react-native-maps';
import { Marker } from 'react-native-maps';
import { LocalTile } from 'react-native-maps';
import Palco from './Palco'


export default class Mapa extends React.Component {

    constructor(props) {

        super(props)

        var {payload} = this.props.navigation.state.params



        this.state = {

            marker: {
                latitude: 0,
                longitude: 0,
            },
            region: {
                latitude: -10.1951935,
                longitude: -48.3240209,
                latitudeDelta: 0.0922,
                longitudeDelta: 0.0421,

            },
            markLat: 0,
            markLong: 0,
            error: null,
            capturando: false,
            coordinates: null,
            payload
        };

    }

    static navigationOptions = {
        header: null,
        gesturesEnabled: true
    }


    componentDidMount() {

        // this.setState({markLat: 'Aguardando ação do usuário', markLong: 'Aguardando ação do usuário'})
        this.capturarCoordenadas()

    }

    capturarCoordenadas() {


        this.setState({capturando: true})
        navigator.geolocation.getCurrentPosition(
            (position) => {

                var coordendadas = {latitude: position.coords.latitude, longitude: position.coords.longitude }
                this.setState({

                    marker: {
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude,
                    },
                    region: {
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude,
                        latitudeDelta: 0.0922,
                        longitudeDelta: 0.0421,

                    },
                    error: null,
                    capturando: false,
                    payload:{...this.state.payload, coordenadas: coordendadas}

                });

               // console.error(this.state.payload.coordenadas)


            },
            (error) => {

                this.setMessageError(error.message)
                this.setState({capturando: false})

            },
            {enableHighAccuracy: true, timeout: 20000, maximumAge: 1000}
        );

    }


    go(){


       // console.error(this.state.payload.coordenadas)
        if(this.state.payload.coordenadas.latitude == 0){

            alert("É necessário a localização para continuar")

        }else{
            this.props.navigation.navigate('Galeria', {payload: this.state.payload})

        }






    }


    setMessageError(error) {
        switch (error) {
            case 'Location request timed out':
                this.setState({error: "Excedeu o tempo de tentativa da captura, tente novamente."})
                break;
            default:
                this.setState({error: error})
                break
        }
    }
//     { this.state.error == null ? null : <Text style={styles.error}>{this.state.error}</Text> }

    render() {

        return (
            <Palco titulo="Localização do Problema" back={() => this.props.navigation.goBack()} go={() =>  this.go()} >

                <View style={styles.dash}>



                    <Text
                        style={[styles.value, {textAlign:'center', width:'100%', marginTop: 10,  fontSize: 15, fontWeight:'bold'  }]}>
                        É importante saber onde ocorreu o problema que será relatado, a precisão é essencial nesta etapa.</Text>


                    { this.state.capturando ?

                        <View style={{ flexDirection: 'row', alignItems: 'center', justifyContent: 'center', marginTop: 10}}>
                            <ActivityIndicator size={20} color="#606062" style={styles.load}/>
                            <Text style={styles.value}>Buscando coordenadas</Text>
                        </View>
                        :
                        <View>
                            <Text style={styles.label}>{this.state.marker.latitude ==0 ? 'POSICIONE-SE EM UM LOCAL MELHOR E TENTE NOVAMENTE' : 'LOCALIZAÇÃO CAPTURADA COM SUCESSO!'} </Text>
                        </View>

                    }

                    {
                        !this.state.capturando ?
                            <Button onPress={()=> this.capturarCoordenadas()} title="Buscar minha localização"/>

                            :null

                    }






                </View>
                <MapView
                    style={styles.map}
                    region={this.state.region}
                >

                    <LocalTile
                        /**
                         * The path template of the locally stored tiles. The patterns {x} {y} {z} will be replaced at runtime
                         * For example, /storage/emulated/0/mytiles/{z}/{x}/{y}.png
                         */
                        pathTemplate={'/storage/emulated/0/mytiles/{z}/{x}/{y}.png'}
                        /**
                         * The size of provided local tiles (usually 256 or 512).
                         */
                        tileSize={256}
                    />

                    {
                        this.state.marker.latitude != 0
                        ?
                            <Marker
                                coordinate={this.state.marker}

                            />
                        : null

                    }


                </MapView>
            </Palco>
        );
    }

}


const styles = StyleSheet.create({


    error: {

        backgroundColor: 'red',
        width: '100%',
        fontSize: 15,
        color: '#fff',
        textAlign: 'center',
        padding: 10,
        //borderRadius: 10,
        marginBottom: 7

    },


    label: {

        fontFamily: "browau",
        fontSize: 15,
        fontWeight: '500',
        textAlign: 'center',
        margin: 5,
        color:'blue'

    },
    value: {
        paddingLeft: 10,
        fontFamily: "browau",
        fontSize: 19,
        textAlign: 'center'

    },
    dash: {
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center'

    },
    map: {

        flex: 2,

    },

    resizeImage: {

        height: Dimensions.get('window').height * .15,
        width: Dimensions.get('window').width * .26,
    },
    btnRecapturar: {
        alignSelf: 'center'
    }


});