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



import MapView from 'react-native-maps';
import { Marker } from 'react-native-maps';
import { LocalTile } from 'react-native-maps';

import axios from 'axios';



export default class MapaVisualizacao extends React.Component {

    constructor(props) {

        super(props)





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
            relatos: [],

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


    getRelatos() {

        this.setState({loading: true});
        axios
            .get('http://192.168.137.1/argos/getRelatos/' + this.state.marker.latitude + '/' + this.state.marker.longitude)
            .then(response=> {


                this.setState({
                    relatos: response.data,
                    loading: false,
                })


            }).catch(error => {

            alert('TENTE NOVAMENTE MAIS TARDE')

            this.setState({
                error: true,
                loading: false

            })

        })


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


                });

                this.getRelatos();



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


    renderMarker(){

        if(this.state.relatos !== []){
            console.error(this.state.relatos )
        }







    }


    detalhes(id){
        this.props.navigation.navigate('Detalhes',{id})
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
                            this.state.relatos.map( relato =>{
                                const cord = {latitude: parseFloat(relato.latitude), longitude: parseFloat(relato.longitude)}



                                var imagem = null;
                               //  console.error(relato.id_categoria)

                                switch(relato.id_categoria){
                                    case 1:
                                        imagem = require('../../images/educacao.png')
                                        break

                                    case 2:
                                        imagem = require('../../images/saude.png')
                                        break

                                    case 3:
                                        imagem = require('../../images/seguranca.png')
                                        break

                                }


                                return <Marker coordinate={cord} title={relato.descricao} onPress={()=>this.detalhes(relato.id)} image={imagem}/>
                            })
                        : null

                    }


                </MapView>

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