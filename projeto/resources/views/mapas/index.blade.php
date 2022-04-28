@extends('layout')

@section('content')

<p>https://openlayers.org/en/latest/doc/quickstart.html</p>
<div id="map" class="map" style="height: 400px"></div>

<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>

<script type="text/javascript">

    const features = [];

    features.push(new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([
            -54.6228302, -20.4970466
        ]))
    }))

    // create the source and layer for random features
    const vectorSource = new ol.source.Vector({
        features
    });

    const vectorLayer = new ol.layer.Vector({
        source: vectorSource,
        style: new ol.style.Style({
            image: new ol.style.Circle({
                radius: 8,
                fill: new ol.style.Fill({
                    color: 'red'
                })
            })
        })
    });

    var map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            }), vectorLayer
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([-54.6228302, -20.4970466]),
            zoom: 12
        })
    });

</script>

@endsection